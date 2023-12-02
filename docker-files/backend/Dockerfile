FROM centos:7

RUN yum -y update

RUN yum -y install epel-release
RUN yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
RUN yum -y --disablerepo="*" --enablerepo="remi-safe" list php[7-9][0-9].x86_64
RUN yum -y install https://packages.endpointdev.com/rhel/7/os/x86_64/endpoint-repo.x86_64.rpm
RUN yum-config-manager --enable remi-php73
RUN yum -y install php php-mysql php-mysqlnd php-pdo php-mbstring php-xml php-bcmath php-ctype php-fileinfo php-json php-imagick cron git nano tcpflow supervisor cronie net-tools php-soap zip unzip php-zip nginx php-fpm git docker mysql-server python3-pymysql python3-pip openssh-server mariadb-server mariadb-client mariadb

COPY systemctl.py /usr/bin/systemctl
RUN chmod a+x /usr/bin/systemctl
EXPOSE 80
EXPOSE 22

RUN mkdir -p /app
RUN mkdir -p /app/public
WORKDIR /app/
# COPY index.php /app/public/
COPY sites.conf /etc/nginx/conf.d/crud.conf
COPY supervisor.conf /etc/supervisor/conf.d/crud.conf
RUN rm -f /etc/localtime && ln -s /usr/share/zoneinfo/Africa/Kampala /etc/localtime
COPY www.conf /etc/php-fpm.d/
COPY install-composer.sh /tmp/
RUN chmod +x /tmp/install-composer.sh

WORKDIR /tmp/
RUN ./install-composer.sh
RUN mv composer.phar /usr/local/bin/composer
RUN composer global require "squizlabs/php_codesniffer=*"
RUN echo "export PATH='$PATH:$HOME/.config/composer/vendor/bin'" >> ~/.bashrc
RUN source ~/.bashrc
RUN rm -fr ~/.ssh/id_rsa*

WORKDIR /app/
# RUN echo "* * * * * root cd /app && sh run_scheduled.sh >> /var/log/cron.log 2>&1" >> /etc/crontab
RUN chown -R mysql:mysql /var/lib/mysql
RUN ssh-keygen -q -t rsa -N '' -f /etc/ssh/ssh_host_rsa_key
RUN ssh-keygen -q -t ed25519 -N '' -f /etc/ssh/ssh_host_ed25519_key
RUN ssh-keygen -q -t ecdsa -N '' -f /etc/ssh/ssh_host_ecdsa_key
RUN yum install -y sudo telnet

RUN pip3 install pymysql
RUN yum install -y php-gd php-posix fcgi 

CMD ["/bin/bash", "-c", "ping -i5 8.8.8.8"]
# CMD ["/bin/bash", "-c", "systemctl start mariadb && systemctl start php-fpm && systemctl start nginx && systemctl start sshd && systemctl start supervisord && systemctl start crond && ping -i5 8.8.8.8"]
