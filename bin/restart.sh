#!/bin/bash
kill -9 `cat ../runtime/hyperf.pid`
nphup php hyperf.php start &