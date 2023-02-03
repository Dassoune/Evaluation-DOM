#!/bin/bash



echo "          Au Bon GlouMiam" ; #affiche le titre du menu
echo "-------------------------------------" ; #affiche la ligne sous le titre
echo "-Entrées" ; #affiche le titre entrées
echo "" ; #affiche la ligne vide
sed -n "1 p" ~/menu.txt ; #affiche la ligne correspondante du fichier.txt correspondant
sed -n "2 p" ~/menu.txt ; #affiche la ligne correspondante du fichier.txt correspondant
sed -n "3 p" ~/menu.txt ; #affiche la ligne correspondante du fichier.txt correspondant
echo "" ; #affiche la ligne vide
#afficher les 3 entrées
echo "-------------------------------------" ; #affiche la ligne sous les entrées
echo "-Plats" ; #affiche le titre plats
echo "" ; #affiche la ligne vide
sed -n "4 p" ~/menu.txt ; #affiche la ligne correspondante du fichier.txt correspondant
sed -n "5 p" ~/menu.txt ; #affiche la ligne correspondante du fichier.txt correspondant
sed -n "6 p" ~/menu.txt ; #affiche la ligne correspondante du fichier.txt correspondant
sed -n "7 p" ~/menu.txt ; #affiche la ligne correspondante du fichier.txt correspondant
echo "" ; #affiche la ligne vide
echo "-------------------------------------" ; #affiche la ligne sous les plats
echo "-Desserts" ; #affiche le titre plats
echo "" ; #affiche la ligne vide
sed -n "8 p" ~/menu.txt ; #affiche la ligne correspondante du fichier.txt correspondant
sed -n "9 p" ~/menu.txt ; #affiche la ligne correspondante du fichier.txt correspondant
echo "" ; #affiche la ligne vide
echo "-------------------------------------" ; #affiche la ligne sous les plats
echo "-Boissons" ; #affiche le titre boissons
echo "" ; #affiche la ligne vide
sed -n "10 p" ~/menu.txt ; #affiche la ligne correspondante du fichier.txt correspondant
sed -n "11 p" ~/menu.txt ; #affiche la ligne correspondante du fichier.txt correspondant
echo "" ; #affiche la ligne vide


array=() #Ici l'index de mon tableau

# Ici ma premiere fonction qui initialise la commande en commencant par l'entrée
function entree() {
	echo "";
        read -p " Entrez le numéro de l'entrée -" ent ;
	prod="$ent"
	prix=$(grep -w "^$prod" menu5.txt | sed -n '1 p' | tail -c 6 | sed 's/€//g')
	read -p " Combien en faut-il ? - " nbent ;
	addition=$(($prix*$nbent))
	array+=($addition)
# Ici une commande pour pouvoir prendre une commande multiple
#read -p " D'autres entrées (o ou n) ? - " suite ;
	#if [ $suite = o ] ; then
        #entree
	#fi
}
# Ici la fonction pour prendre la commande du plat
function plat() {
	echo "";
	read -p " Entrez le numéro du plat -" pla ;
        prod="$pla"
        prix=$(grep -w "^$prod" menu5.txt | sed -n '1 p' | tail -c 6 | sed 's/€//g')
        read -p " Combien en faut-il ? - " nbpla ;
        addition=$(($prix*$nbpla))
        array+=($addition)
# Ici une commande pour pouvoir prendre une commande multiple
#read -p " D'autres plats (o ou n) ? - " suite ;
         #if [ $suite = o ] ; then
         #plat
         #fi
}
#Ici la fonction pour prendre la commande du dessert
function dessert() {
	echo "";
        read -p " Entrez le numéro du dessert -" des ;
	prod="$des"
        prix=$(grep -w "^$prod" menu5.txt | sed -n '1 p' | tail -c 6 | sed 's/€//g')
        read -p " Combien en faut-il ? - " nbdes ;
        addition=$(($prix*$nbdes))
        array+=($addition)
# Ici une commande pour pouvoir prendre une commande multiple
#read -p " D'autres desserts (o ou n) ? - " suite ;
        #if [ $suite = o ] ; then
        #dessert
        #fi
}
#Ici la fonction pour prendre la commande de la boisson
function boisson() {
	echo "";
        read -p " Entrez le numéro de la boisson -" boi ;
	prod="$boi"
        prix=$(grep -w "^$prod" menu5.txt | sed -n '1 p' | tail -c 6 | sed 's/€//g')
        read -p " Combien en faut-il ? - " nbboi ;
        addition=$(($prix*$nbdes))
        array+=($addition)
	echo "";
# Ici une commande pour pouvoir prendre une commande multiple
#read -p " D'autres boissons (o ou n) ? - " suite ;
        #if [ $suite = o ] ; then
        #boisson
        #fi
}


function addition() {
    result=0
    for i in ${array[@]}
        do
        let result+=$i
    done
    ht=$result
    tva=11.67/100
    echo "Total HT : $ht €"               # Affiche le montant HT de la commande
    montant_tva=$(bc -l <<<"scale=2; $ht*$tva") # Calcule le montant le la TVA
    echo "TVA à 11,67 : $montant_tva €"         # Affiche le montant de la TVA
    ttc=$(bc -l <<<"scale=2; $result+$montant_tva") # Calcule le montant total TTC (HT + TVA)
    echo "Total TTC : $ttc €"             # Affiche le montant total TTC de la commande
}

# Ici des conditions pour choisir ou non des entrée/plats/desserts/boissons à ajouter avant les fonctions si besoin

#read -p " Faut-il une entrée ( o ou n ) ? " entree1
# if [ $entree1 = "n" ] ; then
  #       plat1
 #fi

 #read -p " Faut-il un plat ( o ou n ) ? " plat1
 #if [ $plat1 = "n" ] ; then
 #        dessert
 #fi

 #read -p " Faut-il un dessert ( o ou n ) ? " dessert1
 #if [ $dessert1 = "n" ] ; then
  #       boisson
 #fi

 #read -p " Faut-il un boisson ( o ou n ) ? " boisson1
 #if [ $boisson1 = "n" ] ; then
#         addition
 #fi

# Ici l'appel des fonctions
entree
plat
dessert
boisson
addition

