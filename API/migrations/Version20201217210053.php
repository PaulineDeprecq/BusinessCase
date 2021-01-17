<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201217210053 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ad_option DROP FOREIGN KEY FK_C7691745A7C41D6F');
        $this->addSql('CREATE TABLE ad_opzione (ad_id INT NOT NULL, opzione_id INT NOT NULL, INDEX IDX_569B18334F34D596 (ad_id), INDEX IDX_569B18335A231F80 (opzione_id), PRIMARY KEY(ad_id, opzione_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opzione (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9BD1F1B75E237E06 (name), UNIQUE INDEX UNIQ_9BD1F1B7659429DB (icon), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ad_opzione ADD CONSTRAINT FK_569B18334F34D596 FOREIGN KEY (ad_id) REFERENCES ad (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ad_opzione ADD CONSTRAINT FK_569B18335A231F80 FOREIGN KEY (opzione_id) REFERENCES opzione (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE ad_option');
        $this->addSql('DROP TABLE `option`');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ad_opzione DROP FOREIGN KEY FK_569B18335A231F80');
        $this->addSql('CREATE TABLE ad_option (ad_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_C76917454F34D596 (ad_id), INDEX IDX_C7691745A7C41D6F (option_id), PRIMARY KEY(ad_id, option_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, icon VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_5A8600B0659429DB (icon), UNIQUE INDEX UNIQ_5A8600B05E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ad_option ADD CONSTRAINT FK_C76917454F34D596 FOREIGN KEY (ad_id) REFERENCES ad (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ad_option ADD CONSTRAINT FK_C7691745A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE ad_opzione');
        $this->addSql('DROP TABLE opzione');
    }
}
