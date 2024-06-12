<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240531132525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, bio LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, location VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, video VARCHAR(255) DEFAULT NULL, category VARCHAR(255) DEFAULT NULL, framework VARCHAR(255) DEFAULT NULL, project_date VARCHAR(255) DEFAULT NULL, project_link VARCHAR(500) DEFAULT NULL, project_image VARCHAR(225) DEFAULT NULL, INDEX IDX_5C93B3A4CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recommendations (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, recommendation LONGTEXT NOT NULL, position VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_73904ED7CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, summary LONGTEXT NOT NULL, company_name VARCHAR(255) DEFAULT NULL, company_location VARCHAR(255) DEFAULT NULL, company_role VARCHAR(500) DEFAULT NULL, company_duration VARCHAR(255) DEFAULT NULL, company_description LONGTEXT DEFAULT NULL, company_achievements LONGTEXT DEFAULT NULL, company_tools LONGTEXT DEFAULT NULL, education_institute VARCHAR(255) DEFAULT NULL, education_graduation VARCHAR(255) DEFAULT NULL, education_topic VARCHAR(500) DEFAULT NULL, skill_programming VARCHAR(500) DEFAULT NULL, skill_framework VARCHAR(500) DEFAULT NULL, skill_db VARCHAR(255) DEFAULT NULL, skill_bug VARCHAR(255) DEFAULT NULL, skill_other VARCHAR(255) DEFAULT NULL, skill_language VARCHAR(255) DEFAULT NULL, INDEX IDX_60C1D0A0CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE recommendations ADD CONSTRAINT FK_73904ED7CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4CCFA12B8');
        $this->addSql('ALTER TABLE recommendations DROP FOREIGN KEY FK_73904ED7CCFA12B8');
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A0CCFA12B8');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE recommendations');
        $this->addSql('DROP TABLE resume');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
