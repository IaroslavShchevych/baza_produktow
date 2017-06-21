# baza_produktow
Projekt bazy produktów

NAZWA PROJEKTU
Baza danych produktów magazynu z web-strona dostepu i rzadzania

CELE PROJEKTU
Sluzy dla zachowania podstawowych danych o wszystkich produktach oraz latwego uzyskania niezbiednych danych przez strone internetowa magazynu (tylko dla upelnomocnionych osob).

SCHEMAT
dostępny w pliku "produkty.png"
Utworzony przez darmową aplikacie yEd (dostępna na https://www.yworks.com/products/yed ). Początkowy plik schematu: "produkty_raw" w folderze projektu.

OPIS
BD zawiera 2 tabele z danymi o produktach. Każda z tabel zawiera osobna część danych w pewnej brazie. 
To jest ich spis:
1. LIST - podstawowe dane o produktach (szczególy, data wpisu o produkcie i t.p.).
2. DOSTAWCA - zawiera dane dane o dostawcach produktów dla magazynu (ID, nazwa, kontakty). Łaczy się z tabelą LIST przez pole "dostawca_id" (odnosi do ID).


TECHNOLOGII REALIZACJI
1. System zarzadzania BD - MySQL na bazie SQL (ang. Structured Query Language – strukturalny jezyk zapytan).
2. Przetrwanie danych od BD dla strony internetowej - jezyk oprogramowania PHP (nazwa-akronim od Hypertext Preprocessor - hypertekstowy preprocessor)
3. Strona internetowa dla uzyskania danych z BD, oraz ich zmiany (dodawanie, usuniecie, tworzenie nowych tabel wedlug BD) - HTML (ang. HyperText Markup Language – hipertekstowy jezyk znacznikow), CSS (ang. Cascading Style Sheets - kaskadowe arkusze stylow).
4. Web server, opracujacy dane od uzytkownika strony, przesylane przez protokol HTTP (HyperTxt Transfer Protokol) i skerujący ich do PHP - Apache (ang. „А PAtCHy server“ - server w ktory wniesiono wiele zmian, patch'ow) z powrotem danych, przetrwanychych od PHP, dla udostepninia ich uzytkowniku na stronie internetowej.

Uwaga! W celach nauczelnich technologii 1-4 rozmieszczone na USB z pomoca programu USBWebserver. W przypadku ich korzytania z ich w rzeczywistosci, oni musza byc rozmieszczone na serwerze ze specjalne skonfigurowanym Internet-laczeniem. 

JAK ZAINSTALOWAĆ PROJEKT NA PENDRIVE?
1. Sciągnać za strony: http://www.usbwebserver.net/en/ i zainstalować na pendrive USBWebserver.
2. Urochomić plik "usbwebserver.exe" i sprawdić czy poprawnie działa serwisy Apache i MySQL (zielony znaczek w interfejsie USBWebserver przy nazwie serwisów).
3. Przejść do phpMyadmin, programu zarządania BD MySQL (kliknij "PHPMyAdmin" na wkladce "Start" USBWebserver). I zalogować się do go (Username: 'root' , password: 'usbw').
4. Zainportować "pierwsza_db.sql" z katalogu projektu na github.com (kliknij "Import" w PHPMyAdmin).
5. Sciągnać pliki projektu w katalog /root na pendrive.
6. Otworzyć strone " http://localhost:8080/ " w przeglądarce.
7. Zarejestruj się do BD i zaczni pracować.

