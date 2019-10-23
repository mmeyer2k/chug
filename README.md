# :arrow_double_down: chug

A docker image for turning web pages into zip files.

## Chugging a webpage

```bash
docker run -v /`pwd`:/data mmeyer2k/chug http://asdf.com
```

## Adding a bash alias
```
alias chug='docker run -v /path/to/storage:/data mmeyer2k/chug'
```
