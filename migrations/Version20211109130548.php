<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211109130548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE achat_livre');
        $this->addSql('ALTER TABLE achat ADD livre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A9845637D925CB FOREIGN KEY (livre_id) REFERENCES livre (id)');
        $this->addSql('CREATE INDEX IDX_26A9845637D925CB ON achat (livre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achat_livre (achat_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_B4493260FE95D117 (achat_id), INDEX IDX_B449326037D925CB (livre_id), PRIMARY KEY(achat_id, livre_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE achat_livre ADD CONSTRAINT FK_B449326037D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE achat_livre ADD CONSTRAINT FK_B4493260FE95D117 FOREIGN KEY (achat_id) REFERENCES achat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A9845637D925CB');
        $this->addSql('DROP INDEX IDX_26A9845637D925CB ON achat');
        $this->addSql('ALTER TABLE achat DROP livre_id');
    }
}
