FROM alpine:3.9

ENV TERM xterm-256color

RUN apk add --no-cache p7zip wget figlet

COPY entrypoint.sh /etc/entrypoint.sh

ENTRYPOINT ["sh", "/etc/entrypoint.sh"]
