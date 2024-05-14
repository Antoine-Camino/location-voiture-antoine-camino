<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240514015529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_availability DROP FOREIGN KEY FK_666E1D5761778466');
        $this->addSql('ALTER TABLE car_availability DROP FOREIGN KEY FK_666E1D57C3C6F69F');
        $this->addSql('DROP TABLE car_availability');
        $this->addSql('ALTER TABLE availability ADD link_car_id INT NOT NULL');
        $this->addSql('ALTER TABLE availability ADD CONSTRAINT FK_3FB7A2BFA202B210 FOREIGN KEY (link_car_id) REFERENCES car (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3FB7A2BFA202B210 ON availability (link_car_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_availability (availability_id INT NOT NULL, car_id INT NOT NULL, INDEX IDX_666E1D5761778466 (availability_id), INDEX IDX_666E1D57C3C6F69F (car_id), PRIMARY KEY(availability_id, car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE car_availability ADD CONSTRAINT FK_666E1D5761778466 FOREIGN KEY (availability_id) REFERENCES availability (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_availability ADD CONSTRAINT FK_666E1D57C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE availability DROP FOREIGN KEY FK_3FB7A2BFA202B210');
        $this->addSql('DROP INDEX UNIQ_3FB7A2BFA202B210 ON availability');
        $this->addSql('ALTER TABLE availability DROP link_car_id');
    }
}
