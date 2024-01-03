FROM hyperf/hyperf:8.2-alpine-v3.18-swoole

RUN apk update \
  && apk upgrade \
  && apk add --no-cache \
    build-base \
    clang \
    clang-dev \
    alpine-sdk \
    dpkg \
    cmake \
    ccache \
    supervisor \
    python3