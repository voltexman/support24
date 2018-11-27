<?php

const SQL_GET_SERVICE_BY_NAME = '
    SELECT name, text
    FROM services
    WHERE alias = :alias
';