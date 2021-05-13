FROM php:8-alpine

ENV TERM xterm-256color

RUN apk add --no-cache p7zip wget 

COPY entrypoint.php /etc/entrypoint.php

ENTRYPOINT ["php", "/etc/entrypoint.php"]
