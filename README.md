"startup" for miux
==============================================================

Basis instanz zum Klonen für neue Projekte

## Todo/Anpassungen
#### Ordner unbenennen
cbp.ch

config -> sites -> projektname anpassen

#### search and replace 
projektname

#### search and replace 
cbp.ch

info@miux.ch

#### Anpassen DB und config
.env Datei anpassen (.env.sample)


### local compilieren CSS/JS/Assets
ext:miux_template->Resources->Privat

npm install

npm audit fix
## für die Testumgebung
npm run watch

## für die Liveumgebung
npx run production

### im TYPO3 BE auf root Ebene Filemount anpassen
Edit Filemount "projektname" on root level


# Live TYPO3
rm htdocs

ln -s cbp.ch/public/ htdocs

CSS/JS compilieren

ext:t3template->Resources->Privat

npm run prod

## composer set version
composer self-update --1  
When you want to go back to version 2 (which you should, after updating or removing the incompatible plugins):
composer self-update --2

# Live TYPO3

Publizieren via git Live / Staging

cp -R typo3.miux.ch typo3_BACK.miux.ch

per ssh im root

git branch 

git checkout master oder staging

git pull

public (CSS,JS) per FTP hochladen

rm -rf typo3_BACK.miux.ch

