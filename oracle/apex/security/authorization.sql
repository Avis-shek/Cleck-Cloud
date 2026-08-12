select 1
from   CLECK_USER
where  UPPER(USER_NAME) = UPPER(:APP_USER)
and    USER_ROLE = 'A'


select 1
from   CLECK_USER
where  UPPER(USER_NAME) = UPPER(:APP_USER)
and    USER_ROLE = 'T'