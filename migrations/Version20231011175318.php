<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231011175318 extends AbstractMigration
{
    private static array $insults = [
        'Pirates!',
        'Doryphore!',
        'Gobbledygooks!',
        'Filibusters!',
        'Slubberdegullions!',
        'Patagonians!',
        'Vampires!',
        'Sycophant!',
        'Kleptomaniacs!',
        'Egoists!',
        'Tramps!',
        'Monopolizers!',
        'Pockmarks!',
        'Belemnite!',
        'Crooks!',
        'Miserable earthworms!',
        'Coconuts!',
        'Harlequin!',
        'Parasites!',
        'Macrocephalic baboon!',
        'Brutes!',
        'Guano gatherer!',
        'Pachyrhizus!',
        'Toads!',
        'Gyroscope!',
        'Bougainvillea!',
        'Bloodsuckers!',
        'Nincompoop!',
        'Shipwreckers!',
        'Cyclone!',
        'Gallows-fodder!',
        'Politician!',
        'Baboon!',
        'Torturers!',
        'Fuzzy-wuzzy!',
        'Blackbird!',
        'Mountebanks!',
        'Cannibal!',
        'Duck-billed platypus!',
        'Black-beetles!',
        'Rhizopods!',
        'Ruffian!',
        'Vermicellis!',
        'Lily-livered bandicoots!',
        'Rats!',
        'Logarithm!',
        'Cro-Magnon!',
        'Freshwater swabs!',
        'Beasts!',
        'Bully!',
        'Anthropophagus!',
        'Pithecanthropuses!',
        'Savages!',
        'Gangsters!',
        'Wreckers!',
        'Vandal!',
        'Carpet-sellers!',
        'Numbskulls!',
        'Gang of thieves!',
        'Slave trader!',
        'Picaroons!',
        'Visigoths!',
        'Toffee-noses!',
        'Anacoluthons!',
        'Hydrocarbon!',
        'Technocrat!',
        'Buccaneer!',
        'Traitors!',
        'Caterpillars!',
        'Odd-toed ungulate!',
        'Woodlice!',
        'Polynesian!',
        'Swine!',
        'Blackguards!',
        'Vegetarian!',
        'Fancy-dress freebooters!',
        'Centipede!',
        'Sea-lice!',
        'Ectoplasm!',
        'Fat faces!',
        'Artichokes!',
        'Troglodytes!',
        'Turncoats!',
        'Bashi-bazouks!',
        'Olympic athlete!',
        'Ectoplasmic Byproduct!',
        'Balkan Beetle!',
        'Two-timing Tartar Twisters!',
        'Terrapins!',
        'Breathalyser!',
        'Profiteers!',
        'Abecedarians!',
        'Vulture!',
        'Pyrographers!',
        'Phylloxera!',
        'Dogs!',
        'Hooligans!',
        'Steamrollers!',
        'Body-snatcher!',
        'Ostrogoth!',
        'Brigand!',
        'Heretic!',
        'Blackamoor!',
        'Anthracite!',
        'Black marketeers!',
        'Ophicleides!',
        'Dynamiter!',
        'Pickled herrings!',
        'Gibbering ghost!',
        'Corsair!',
        'Moujiks!',
        'Bootlegger!',
        'Gogglers!',
        'Villain!',
        'Bagpipers!',
        'Crab apples!',
        'Goosecaps!',
        'Aztecs!',
        'Paranoiac!',
        'Twister!',
        'Vagabonds!',
        'Sea gherkins!',
        'Road hogs!',
        'Hi-jackers!',
        'Zapotecs!',
        'Cercopithecus!',
        'Psychopath!',
        'Nest of rattlesnakes!',
        'Jellied eel!',
        'Liquorice!',
        'Coelacanth!',
        'Invertebrate!',
        'Nyctalops!',
        'Mameluke!',
        'Dipsomaniac!',
        'Diplodocus!',
        'Cowards!',
        'Megalomaniac!',
        'Highwayman!',
        'Autocrats!',
        'Bandit!',
        'Nitwits!',
        'Polygraphs!',
        'Iconoclast!',
        'Orangoutang!',
        'Squawking popinjay!',
        'Prattling porpoise!',
        'Scoffing braggart!',
        'Murderers!',
        'Rotten sand-hoppers!',
    ];
    public function getDescription(): string
    {
        return 'Populate haddock table';
    }

    public function up(Schema $schema): void
    {
        foreach(self::$insults as $insult) {
            $this->addSql("INSERT INTO haddock(insult, used_count) VALUES ('$insult' ,0);");
        }
    }

    public function down(Schema $schema): void
    {
        foreach(self::$insults as $insult) {
            $this->addSql("DELETE FROM haddock WHERE insult = '$insult';");
        }
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
