FROM centos:7

# Copy needed files
COPY mariadb.repo /etc/yum.repos.d/

# Update and install packages
RUN yum -y update
RUN yum install -y \
    epel-release \
    http://rpms.remirepo.net/enterprise/remi-release-7.rpm \
    https://packages.endpointdev.com/rhel/7/os/x86_64/endpoint-repo.x86_64.rpm
RUN yum -y --disablerepo="*" --enablerepo="remi-safe" list php[7-9][0-9].x86_64
RUN yum-config-manager --enable remi-php73
RUN yum install -y \
    php php-mysql php-mysqlnd php-pdo php-mbstring php-xml php-bcmath php-ctype php-fileinfo php-json php-imagick \
    cron git nano tcpflow supervisor cronie net-tools php-soap zip unzip php-zip MariaDB-client nginx php-fpm git docker \
    mysql-server python3-pymysql python3-pip openssh-server sudo telnet php-gd php-posix fcgi

RUN pip3 install pymysql
COPY systemctl.py /usr/bin/systemctl
RUN chmod a+x /usr/bin/systemctl

# Expose http and ssh ports
EXPOSE 80
EXPOSE 22

WORKDIR /var/www
COPY app.conf /etc/nginx/conf.d/app.conf
COPY supervisor.conf /etc/supervisor/conf.d/crud.conf
COPY fpm.conf /etc/php-fpm.d/
COPY install-composer.sh /tmp/
COPY custom_script.sh /var/www

RUN rm -f /etc/localtime && ln -s /usr/share/zoneinfo/Africa/Kampala /etc/localtime
RUN chmod +x /tmp/install-composer.sh

# Install composer
WORKDIR /tmp/
RUN ./install-composer.sh
RUN mv composer.phar /usr/local/bin/composer
RUN composer global require "squizlabs/php_codesniffer=*"
RUN echo "export PATH='$PATH:$HOME/.config/composer/vendor/bin'" >> ~/.bashrc
RUN source ~/.bashrc
RUN rm -fr ~/.ssh/id_rsa*

WORKDIR /var/www
RUN echo "0 0 * * * root cd /var/www && sh custom_script.sh >> /var/log/cron.log 2>&1" >> /etc/crontab
RUN chown -R mysql:mysql /var/lib/mysql
RUN ssh-keygen -q -t rsa -N '' -f /etc/ssh/ssh_host_rsa_key

CMD ["/bin/bash", "-c", "systemctl start supervisord && systemctl start crond && systemctl start php-fpm && systemctl start nginx && systemctl start mysql && systemctl start sshd && ping 8.8.8.8"]