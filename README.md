# chug

A docker image for archiving webpages with wget.

## Adding a bash alias
```
alias chug='docker run --rm -u $(id -u ${USER}):$(id -g ${USER}) -v "$(pwd)":/data mmeyer2k/chug'
```

## Using chug (basic)
```bash
chug http://www.example.com
```

## Output to 7zip file
```bash
chug --zip http://www.example.com
```