beautify cody
run
```shell
./vendor/bin/pint

# code check
./vendor/bin/psalm
```

init run

need elaticsearch8
```shell
php -d memory_limit=-1 bin/magento setup:install --base-url="http://swift.test" --db-host=127.0.0.1 --db-name=swift_test --db-user=root --db-password=password --admin-firstname=Ben --admin-lastname=Huang --admin-email=benhuang1024@gmail.com --admin-user=ben --admin-password=d3d34d33 --language=zh_Hans_CN --currency=CNY --timezone=Asia/Shanghai --use-rewrites=1 --cleanup-database --cache-backend=redis --cache-backend-redis-server=127.0.0.1 --cache-backend-redis-db=1 --session-save=redis --session-save-redis-host=127.0.0.1 --session-save-redis-db=0 --search-engine=elasticsearch7 --elasticsearch-host="127.0.0.1" --elasticsearch-port=9200 --elasticsearch-enable-auth=0 --elasticsearch-username=elastic --elasticsearch-index-prefix=swift
```

INSERT INTO `core_config_data` (`config_id`, `scope`, `scope_id`, `path`, `value`) VALUES (NULL, 'default', '0', 'dev/static/sign', '0')

need disable two_
