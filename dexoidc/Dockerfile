FROM golang:1.8

MAINTAINER Anthony Smith <anthony@sticksnleaves.com>

ENV DEX_HOME /go/src/github.com/coreos/dex
ENV DEX_VERSION 2.2.4

ENV PATH $DEX_HOME/bin:$PATH

RUN apt-get update -y && \
    apt-get upgrade -y && \
    apt-get install sqlite3 -y && \
    apt-get clean -y

RUN mkdir -p $DEX_HOME

RUN curl -L https://github.com/coreos/dex/archive/v$DEX_VERSION.tar.gz | tar zx && \
    cp -R dex-$DEX_VERSION/* $DEX_HOME && \
    rm -rf dex-$DEX_VERSION

RUN cd $DEX_HOME && \
    make

RUN mkdir -p /etc/dex && touch /etc/dex/tls.key && touch /etc/dex/tls.crt

RUN openssl req -x509 -nodes -days 730 -newkey rsa:2048 \
                 -subj "/C=DE/ST=BER/L=BER/O=HUB/CN=DEX_BASE_URL_AS_CN" \
-keyout /etc/dex/tls.key -out /etc/dex/tls.crt

COPY config-dev.yaml $DEX_HOME/examples/config-dev.yaml

WORKDIR $DEX_HOME

EXPOSE 5554 5556

#ENTRYPOINT ["dex"]

CMD ["bin/dex","serve","examples/config-dev.yaml"]
