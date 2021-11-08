<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211108132814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achat (id INT AUTO_INCREMENT NOT NULL, data_achat DATETIME NOT NULL, renvoie DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE achat_user (achat_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_10A9589EFE95D117 (achat_id), INDEX IDX_10A9589EA76ED395 (user_id), PRIMARY KEY(achat_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE achat_livre (achat_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_B4493260FE95D117 (achat_id), INDEX IDX_B449326037D925CB (livre_id), PRIMARY KEY(achat_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achat_user ADD CONSTRAINT FK_10A9589EFE95D117 FOREIGN KEY (achat_id) REFERENCES achat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE achat_user ADD CONSTRAINT FK_10A9589EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE achat_livre ADD CONSTRAINT FK_B4493260FE95D117 FOREIGN KEY (achat_id) REFERENCES achat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE achat_livre ADD CONSTRAINT FK_B449326037D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achat_user DROP FOREIGN KEY FK_10A9589EFE95D117');
        $this->addSql('ALTER TABLE achat_livre DROP FOREIGN KEY FK_B4493260FE95D117');
        $this->addSql('ALTER TABLE achat_user DROP FOREIGN KEY FK_10A9589EA76ED395');
        $this->addSql('DROP TABLE achat');
        $this->addSql('DROP TABLE achat_user');
        $this->addSql('DROP TABLE achat_livre');
        $this->addSql('DROP TABLE user');
    }
}
