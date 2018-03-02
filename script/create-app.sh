#!/bin/bash

## Remove StatelessExample files
rm -rf .git CHANGELOG.md LICENSE README.md

## Initialize empty Git repository
git init

## Install packages
./script/install.sh

## Replace package file names
read -p "Project Name: " projectName;

sed -i "2s/.*/    \"name\": \"$projectName\",/" composer.json;
sed -i "2s/.*/  \"name\": \"$projectName\",/" package-lock.json;
sed -i "2s/.*/  \"name\": \"$projectName\",/" package.json;

## Create initial commit
git add .
git commit -m "Added StatelessExample"

## Show splash screen
echo "";
echo "";
echo "# ------------------------------------------------------";
echo "# Stateless Example";
echo "# ------------------------------------------------------";
echo "";
echo "Your app was created if you didn't see any errors above.  You are now ready ";
echo "to build your app!";
echo "";
echo "Next steps:";
echo "";
echo "    - Follow the tutorial: https://github.com/StatelessSoftware/StatelessExample";
echo "    - Compile (Compile the sass and js) - Run \`npm run build\`";
echo "    - Push to Github";
echo "        - A blank github repository was created here for you.  You can push it to Github.";
echo "        - Create a blank Github repository (NO README OR ANY OTHER FILES!)";
echo "        - Follow the instructions to push an existing repository on github";
echo "";
