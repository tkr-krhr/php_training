#
# Copyright The Asahi Shimbun Company. All rights reserved.
#
# For the full copyright and license information,
# please view the LICENSE file that was distributed with this source code.
#

FROM node:16-alpine as node
FROM nginx:1.20-alpine
LABEL maintainer="ucan-lab <yes@u-can.pro>"
SHELL ["/bin/ash", "-oeux", "pipefail", "-c"]

ENV TZ=UTC
RUN apk update && apk add --update --no-cache --virtual=.build-dependencies g++

# node command
COPY --from=node /usr/local/bin /usr/local/bin
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /opt /opt

ENV APP_HOME /work/backend
RUN mkdir -p $APP_HOME

ADD docker/env.dev/nginx/conf.d /etc/nginx/conf.d

VOLUME $APP_HOME
