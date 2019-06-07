FROM phusion/baseimage:0.9.19

ENV HOME /root

RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php 2>&1 && \
	apt-get update && \
	apt-get install -y time php7.1-dev php7.1-cli php7.1-mcrypt php7.1-gd \
	php7.1-curl php7.1-intl php7.1-xsl php7.1-soap php7.1-mbstring 2>&1 && \
    mkdir -p /usr/local/bin/ && \
    phpenmod mcrypt && \
    phpenmod intl && \
    echo "set nocompatible" > ~/.vimrc && echo "set backspace=indent,eol,start" >> ~/.vimrc

RUN apt-get clean && rm -rf $(echo /var/lib/apt/lists/)* $(echo /tmp/)* $(echo /var/tmp/)*

CMD ["/sbin/my_init"]
