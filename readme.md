# Twirp

* wget https://github.com/protocolbuffers/protobuf/releases/download/v3.11.2/protoc-3.11.2-linux-x86_64.zip
* unzip protoc-3.11.2-linux-x86_64.zip
* wget https://github.com/twirphp/twirp/releases/download/v0.5.3/protoc-gen-twirp_php_0.5.3_linux_amd64.tar.gz
* tar xf protoc-gen-twirp_php_0.5.3_linux_amd64.tar.gz
* rm -rf protoc-gen-twirp_php_0.5.3_linux_amd64.tar.gz CHANGELOG.md LICENSE LICENSE_THIRD_PARTY
* mkdir twirp/generated
* ./protoc -I . --plugin=protoc-gen-twirp_php=protoc-gen-twirp_php --twirp_php_out=twirp/generated --php_out=twirp/generated service.proto

# Grpc

* wget https://github.com/spiral/php-grpc/releases/download/v1.1.0/protoc-gen-php-grpc-1.1.0-linux-amd64.tar.gz
* tar xf protoc-gen-php-grpc-1.1.0-linux-amd64.tar.gz
* rm protoc-gen-php-grpc-1.1.0-linux-amd64.tar.gz
* mv protoc-gen-php-grpc-1.1.0-linux-amd64/protoc-gen-php-grpc .
* wget https://github.com/spiral/php-grpc/releases/download/v1.1.0/rr-grpc-1.1.0-linux-amd64.tar.gz
* tar xf rr-grpc-1.1.0-linux-amd64.tar.gz
* rm rr-grpc-1.1.0-linux-amd64.tar.gz
* mv rr-grpc-1.1.0-linux-amd64/rr-grpc .
* rm -rf rr-grpc-1.1.0-linux-amd64
* mkdir grpc/generated
* ./protoc -I . --plugin=protoc-gen-php-grpc --php_out=grpc/generated --php-grpc_out=grpc/generated service.proto