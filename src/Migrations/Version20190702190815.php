<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190702190815 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(100) DEFAULT NULL, updated DATETIME NOT NULL, path VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_D8698A7612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_tag (document_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_D0234567C33F7837 (document_id), INDEX IDX_D0234567BAD26311 (tag_id), PRIMARY KEY(document_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE document_tag ADD CONSTRAINT FK_D0234567C33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document_tag ADD CONSTRAINT FK_D0234567BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE document_tag DROP FOREIGN KEY FK_D0234567BAD26311');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A7612469DE2');
        $this->addSql('ALTER TABLE document_tag DROP FOREIGN KEY FK_D0234567C33F7837');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE document_tag');
    }
}
