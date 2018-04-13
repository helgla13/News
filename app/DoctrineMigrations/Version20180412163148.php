<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180412163148 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950B5A459A0');
        $this->addSql('DROP INDEX IDX_1DD39950B5A459A0 ON news');
        $this->addSql('ALTER TABLE news DROP news_id');
        $this->addSql('ALTER TABLE comments ADD newsID INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A22BB085D FOREIGN KEY (newsID) REFERENCES news (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A22BB085D ON comments (newsID)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A22BB085D');
        $this->addSql('DROP INDEX IDX_5F9E962A22BB085D ON comments');
        $this->addSql('ALTER TABLE comments DROP newsID');
        $this->addSql('ALTER TABLE news ADD news_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950B5A459A0 FOREIGN KEY (news_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_1DD39950B5A459A0 ON news (news_id)');
    }
}
