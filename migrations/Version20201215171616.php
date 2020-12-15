<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201215171616 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ad (id INT AUTO_INCREMENT NOT NULL, fuel_id INT NOT NULL, color_id INT DEFAULT NULL, car_id INT NOT NULL, crit_air_id INT DEFAULT NULL, garage_id INT NOT NULL, title VARCHAR(255) NOT NULL, body LONGTEXT NOT NULL, circulation_date DATETIME NOT NULL, mileage INT NOT NULL, price INT NOT NULL, reference VARCHAR(20) NOT NULL, published_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, has_five_doors TINYINT(1) DEFAULT NULL, has_mechanical_gearbox TINYINT(1) DEFAULT NULL, co2emission INT DEFAULT NULL, seat_nbr INT DEFAULT NULL, speed_nbr INT DEFAULT NULL, consumption_l100 INT DEFAULT NULL, is_leather_upholstery TINYINT(1) DEFAULT NULL, displacement INT DEFAULT NULL, din_power INT DEFAULT NULL, fiscal_power INT DEFAULT NULL, max_speed INT DEFAULT NULL, acceleration DOUBLE PRECISION DEFAULT NULL, INDEX IDX_77E0ED5897C79677 (fuel_id), INDEX IDX_77E0ED587ADA1FB5 (color_id), INDEX IDX_77E0ED58C3C6F69F (car_id), INDEX IDX_77E0ED5852F6984D (crit_air_id), INDEX IDX_77E0ED58C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, first_line VARCHAR(255) NOT NULL, second_line VARCHAR(255) DEFAULT NULL, third_line VARCHAR(255) DEFAULT NULL, town VARCHAR(255) NOT NULL, post_code VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE builder (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, generation_id INT DEFAULT NULL, version_id INT DEFAULT NULL, model_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_773DE69D553A6EC4 (generation_id), INDEX IDX_773DE69D4BBC2705 (version_id), INDEX IDX_773DE69D7975B7E7 (model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_finish (car_id INT NOT NULL, finish_id INT NOT NULL, INDEX IDX_38A107EAC3C6F69F (car_id), INDEX IDX_38A107EA2B4667EB (finish_id), PRIMARY KEY(car_id, finish_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(255) NOT NULL, paint_type VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE crit_air (id INT AUTO_INCREMENT NOT NULL, certificate INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE finish (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fuel (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, address_id INT NOT NULL, professional_id INT NOT NULL, name VARCHAR(255) NOT NULL, phone_number VARCHAR(20) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_9F26610BF5B7AF75 (address_id), INDEX IDX_9F26610BDB77003 (professional_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE generation (id INT AUTO_INCREMENT NOT NULL, generation VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, builder_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_D79572D9959F66E4 (builder_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE option_ad (option_id INT NOT NULL, ad_id INT NOT NULL, INDEX IDX_6F1D9767A7C41D6F (option_id), INDEX IDX_6F1D97674F34D596 (ad_id), PRIMARY KEY(option_id, ad_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professional (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phone_number VARCHAR(20) NOT NULL, siret VARCHAR(14) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, is_validate TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_B3B573AAE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE version (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED5897C79677 FOREIGN KEY (fuel_id) REFERENCES fuel (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED587ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED58C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED5852F6984D FOREIGN KEY (crit_air_id) REFERENCES crit_air (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED58C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D553A6EC4 FOREIGN KEY (generation_id) REFERENCES generation (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D4BBC2705 FOREIGN KEY (version_id) REFERENCES version (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE car_finish ADD CONSTRAINT FK_38A107EAC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_finish ADD CONSTRAINT FK_38A107EA2B4667EB FOREIGN KEY (finish_id) REFERENCES finish (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BDB77003 FOREIGN KEY (professional_id) REFERENCES professional (id)');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D9959F66E4 FOREIGN KEY (builder_id) REFERENCES builder (id)');
        $this->addSql('ALTER TABLE option_ad ADD CONSTRAINT FK_6F1D9767A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE option_ad ADD CONSTRAINT FK_6F1D97674F34D596 FOREIGN KEY (ad_id) REFERENCES ad (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE option_ad DROP FOREIGN KEY FK_6F1D97674F34D596');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610BF5B7AF75');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D9959F66E4');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED58C3C6F69F');
        $this->addSql('ALTER TABLE car_finish DROP FOREIGN KEY FK_38A107EAC3C6F69F');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED587ADA1FB5');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED5852F6984D');
        $this->addSql('ALTER TABLE car_finish DROP FOREIGN KEY FK_38A107EA2B4667EB');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED5897C79677');
        $this->addSql('ALTER TABLE ad DROP FOREIGN KEY FK_77E0ED58C4FFF555');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D553A6EC4');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D7975B7E7');
        $this->addSql('ALTER TABLE option_ad DROP FOREIGN KEY FK_6F1D9767A7C41D6F');
        $this->addSql('ALTER TABLE garage DROP FOREIGN KEY FK_9F26610BDB77003');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D4BBC2705');
        $this->addSql('DROP TABLE ad');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE builder');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_finish');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE crit_air');
        $this->addSql('DROP TABLE finish');
        $this->addSql('DROP TABLE fuel');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE generation');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE option_ad');
        $this->addSql('DROP TABLE professional');
        $this->addSql('DROP TABLE version');
    }
}
