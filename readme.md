# Twirp

* wget https://github.com/protocolbuffers/protobuf/releases/download/v3.11.2/protoc-3.11.2-linux-x86_64.zip
* unzip protoc-3.11.2-linux-x86_64.zip
* wget https://github.com/twirphp/twirp/releases/download/v0.5.3/protoc-gen-twirp_php_0.5.3_linux_amd64.tar.gz
* tar xf protoc-gen-twirp_php_0.5.3_linux_amd64.tar.gz
* rm -rf protoc-gen-twirp_php_0.5.3_linux_amd64.tar.gz CHANGELOG.md LICENSE LICENSE_THIRD_PARTY
* ./protoc -I . --plugin=protoc-gen-twirp_php=protoc-gen-twirp_php --twirp_php_out=twirp/generated --php_out=twirp/generated service.proto
