# Alter pg_hba.conf to actually require passwords.  The default image exposes
# allows any user to connect without requiring a password, which is a liability
# if this is run forwarding ports from the host machine.
sed -ri -e '$ahost all all 0.0.0\/0 md5' "$PGDATA"/pg_hba.conf


# Add logging
sed -ri -e '$a\
log\_directory \= '\''pg\_log'\''\
log\_filename \= '\''postgresql\-\%Y\-\%m\-\%d\_\%H\%M\%S\.log'\''\
log\_statement \= '\''all'\''\
logging\_collector \= on\
log\_line\_prefix \= '\''\%t \%c \%u'\''\
log\_destination \= '\''stderr, csvlog'\''\
log\_rotation\_size \= 15MB\
log\_rotation\_age \= 1d\
' "$PGDATA"/postgresql.conf
