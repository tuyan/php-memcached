#!/bin/sh

PACKAGE=memcached
VERSION=0
CONFIG="--enable-memcached=shared --with-libmemcached-dir=/galleria/sw/libmemcached --enable-memcached-igbinary"

PHP_VERSION=5.2

if [ -z "$BUILDSHDIR" ]; then
	BUILDSHDIR="/galleria/sw/buildsh0"
fi

. "${BUILDSHDIR}/build_common.sh"
. "${BUILDSHDIR}/build_php.sh"

package_build $@
