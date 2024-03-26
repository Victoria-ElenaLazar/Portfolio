<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240326073756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resume ADD company_name VARCHAR(255) DEFAULT NULL, ADD company_location VARCHAR(255) DEFAULT NULL, ADD company_role VARCHAR(500) DEFAULT NULL, ADD company_duration VARCHAR(255) DEFAULT NULL, ADD company_description LONGTEXT DEFAULT NULL, ADD company_achievements LONGTEXT DEFAULT NULL, ADD company_tools LONGTEXT DEFAULT NULL, ADD education_institute VARCHAR(255) DEFAULT NULL, ADD education_graduation VARCHAR(255) DEFAULT NULL, ADD education_topic VARCHAR(500) DEFAULT NULL, ADD skill_programming VARCHAR(500) DEFAULT NULL, ADD skill_framework VARCHAR(500) DEFAULT NULL, ADD skill_db VARCHAR(255) DEFAULT NULL, ADD skill_bug VARCHAR(255) DEFAULT NULL, ADD skill_other VARCHAR(255) DEFAULT NULL, ADD skill_language VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resume DROP company_name, DROP company_location, DROP company_role, DROP company_duration, DROP company_description, DROP company_achievements, DROP company_tools, DROP education_institute, DROP education_graduation, DROP education_topic, DROP skill_programming, DROP skill_framework, DROP skill_db, DROP skill_bug, DROP skill_other, DROP skill_language');
    }
}
