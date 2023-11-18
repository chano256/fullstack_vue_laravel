FROM mariadb:10.5
COPY entrypoint.sh /opt/app/
RUN chmod 777 /opt/app/entrypoint.sh
RUN rm docker-entrypoint.sh
ENTRYPOINT ["/opt/app/entrypoint.sh"]
CMD ["mysqld"]