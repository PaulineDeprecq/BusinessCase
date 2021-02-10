<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210145554 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ad ADD paint_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED589BA9A641 FOREIGN KEY (paint_type_id) REFERENCES color_type (id)');
        $this->addSql('CREATE INDEX IDX_77E0ED589BA9A641 ON ad (paint_type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED589BA9A641');
        $this->addSql('DROP INDEX IDX_77E0ED589BA9A641 ON ad');
        $this->addSql('ALTER TABLE ad DROP paint_type_id');
    }
}
