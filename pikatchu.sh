#!/bin/bash
git add $(find . -mindepth 1 -maxdepth 1 -type f)
commit_message=$1
if [ -z "$commit_message" ]; then
    echo "Veuillez fournir un message de commit."
    exit 1
fi
git commit -m "$commit_message"
git pull
git push
