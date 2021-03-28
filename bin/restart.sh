#!/bin/bash
kill -9 `cat ../runtime/hyperf.pid`
nohup php hyperf.php start &