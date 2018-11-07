<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181105195024 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, address VARCHAR(255) NOT NULL, zip_code INT NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE places (id INT AUTO_INCREMENT NOT NULL, location_id INT DEFAULT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, open_hour TIME DEFAULT NULL, close_hour TIME DEFAULT NULL, status ENUM(\'Not Verified\', \'Verified\', \'Closed\') NOT NULL COMMENT \'(DC2Type:placesStatus)\', pictures LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_FEAF6C5564D218E (location_id), INDEX IDX_FEAF6C55A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating (id INT AUTO_INCREMENT NOT NULL, place_id INT NOT NULL, author_id INT NOT NULL, rate_level SMALLINT NOT NULL, content VARCHAR(1024) DEFAULT NULL, publish DATETIME NOT NULL, pictures LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_D8892622DA6A219 (place_id), INDEX IDX_D8892622F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, place_id INT DEFAULT NULL, status ENUM(\'Open\', \'Closed\') NOT NULL COMMENT \'(DC2Type:requestStatus)\', result ENUM(\'Accepted\', \'Rejected\') NOT NULL COMMENT \'(DC2Type:requestResult)\', content ENUM(\'User Report Place Closed\', \'User Deleted Account\', \'User Request Verify Place\', \'User Delete Place\') NOT NULL COMMENT \'(DC2Type:requestenum)\', INDEX IDX_3B978F9FA76ED395 (user_id), INDEX IDX_3B978F9FDA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_info (user_id INT NOT NULL, address_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_B1087D9EF5B7AF75 (address_id), PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vote (user_id INT NOT NULL, rating_id INT NOT NULL, vote_point ENUM(\'Up\', \'Down\') NOT NULL COMMENT \'(DC2Type:voteenum)\', INDEX IDX_5A108564A76ED395 (user_id), INDEX IDX_5A108564A32EFC6 (rating_id), PRIMARY KEY(user_id, rating_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE places ADD CONSTRAINT FK_FEAF6C5564D218E FOREIGN KEY (location_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE places ADD CONSTRAINT FK_FEAF6C55A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622DA6A219 FOREIGN KEY (place_id) REFERENCES places (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9FDA6A219 FOREIGN KEY (place_id) REFERENCES places (id)');
        $this->addSql('ALTER TABLE user_info ADD CONSTRAINT FK_B1087D9EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_info ADD CONSTRAINT FK_B1087D9EF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564A32EFC6 FOREIGN KEY (rating_id) REFERENCES rating (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE places DROP FOREIGN KEY FK_FEAF6C5564D218E');
        $this->addSql('ALTER TABLE user_info DROP FOREIGN KEY FK_B1087D9EF5B7AF75');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D8892622DA6A219');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9FDA6A219');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564A32EFC6');
        $this->addSql('ALTER TABLE places DROP FOREIGN KEY FK_FEAF6C55A76ED395');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D8892622F675F31B');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9FA76ED395');
        $this->addSql('ALTER TABLE user_info DROP FOREIGN KEY FK_B1087D9EA76ED395');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564A76ED395');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE places');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE request');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_info');
        $this->addSql('DROP TABLE vote');
    }
}
