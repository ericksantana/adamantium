#!/bin/bash
echo "Checkout branch $1"
git checkout $1
echo "Pulling code changes from git repository branch $1"
git pull origin $1
