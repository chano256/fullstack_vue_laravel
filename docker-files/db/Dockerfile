FROM mariadb:10.3

RUN apt-get update && apt-get install iputils-ping
COPY entrypoint.sh /opt/app/
RUN chmod 777 /opt/app/entrypoint.sh
RUN rm docker-entrypoint.sh
ENTRYPOINT ["/opt/app/entrypoint.sh"]
CMD ["mysqld"]