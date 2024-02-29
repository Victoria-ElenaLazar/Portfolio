<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229103551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projects ADD profile_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('CREATE INDEX IDX_5C93B3A4CCFA12B8 ON projects (profile_id)');
        $this->addSql('ALTER TABLE resume ADD profile_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('CREATE INDEX IDX_60C1D0A0CCFA12B8 ON resume (profile_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A0CCFA12B8');
        $this->addSql('DROP INDEX IDX_60C1D0A0CCFA12B8 ON resume');
        $this->addSql('ALTER TABLE resume DROP profile_id');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4CCFA12B8');
        $this->addSql('DROP INDEX IDX_5C93B3A4CCFA12B8 ON projects');
        $this->addSql('ALTER TABLE projects DROP profile_id');
    }
}
