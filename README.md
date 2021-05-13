# chug

A docker image for turning web pages into 7zip files.

## Adding a bash alias
```
alias chug='docker run --rm -v "$(pwd)":/data mmeyer2k/chug'
```

## Using chug
```bash
chug http://www.example.com
```
