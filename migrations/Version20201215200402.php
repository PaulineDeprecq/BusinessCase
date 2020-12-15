<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201215200402 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D627AF495E237E06 ON builder (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_665648E9665648E9 ON color (color)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B357DFB3219CDA4A ON crit_air (certificate)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_20C9EB185E237E06 ON finish (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_31BD6FE98CDE5729 ON fuel (type)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9F26610B6B01BC5B ON garage (phone_number)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D3266C3BD3266C3B ON generation (generation)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D79572D95E237E06 ON model (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8600B05E237E06 ON `option` (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8600B0659429DB ON `option` (icon)');
        $this->addSql('ALTER TABLE professional ADD username VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B3B573AA6B01BC5B ON professional (phone_number)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B3B573AA26E94372 ON professional (siret)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BF1CD3C35E237E06 ON version (name)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_D627AF495E237E06 ON builder');
        $this->addSql('DROP INDEX UNIQ_665648E9665648E9 ON color');
        $this->addSql('DROP INDEX UNIQ_B357DFB3219CDA4A ON crit_air');
        $this->addSql('DROP INDEX UNIQ_20C9EB185E237E06 ON finish');
        $this->addSql('DROP INDEX UNIQ_31BD6FE98CDE5729 ON fuel');
        $this->addSql('DROP INDEX UNIQ_9F26610B6B01BC5B ON garage');
        $this->addSql('DROP INDEX UNIQ_D3266C3BD3266C3B ON generation');
        $this->addSql('DROP INDEX UNIQ_D79572D95E237E06 ON model');
        $this->addSql('DROP INDEX UNIQ_5A8600B05E237E06 ON `option`');
        $this->addSql('DROP INDEX UNIQ_5A8600B0659429DB ON `option`');
        $this->addSql('DROP INDEX UNIQ_B3B573AA6B01BC5B ON professional');
        $this->addSql('DROP INDEX UNIQ_B3B573AA26E94372 ON professional');
        $this->addSql('ALTER TABLE professional DROP username');
        $this->addSql('DROP INDEX UNIQ_BF1CD3C35E237E06 ON version');
    }
}
