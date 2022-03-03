<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220303103422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, categories_id INT NOT NULL, name VARCHAR(255) NOT NULL, nb_kilometers VARCHAR(6) NOT NULL, circulation_date VARCHAR(10) NOT NULL, kilometers VARCHAR(6) NOT NULL, color VARCHAR(20) NOT NULL, number_doors INT NOT NULL, price DOUBLE PRECISION NOT NULL, critair INT NOT NULL, carburant VARCHAR(20) NOT NULL, gearbox_type VARCHAR(15) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_95C71D14A21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(30) NOT NULL, INDEX IDX_3AF34668727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, cars_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6A8702F506 (cars_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_details (orders_id INT NOT NULL, cars_id INT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_845CA2C1CFFE9AD6 (orders_id), INDEX IDX_845CA2C18702F506 (cars_id), PRIMARY KEY(orders_id, cars_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, reference VARCHAR(20) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_E52FFDEEAEA34913 (reference), INDEX IDX_E52FFDEE67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lastname VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, address VARCHAR(255) NOT NULL, zipcode VARCHAR(5) NOT NULL, city VARCHAR(100) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D14A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668727ACA70 FOREIGN KEY (parent_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A8702F506 FOREIGN KEY (cars_id) REFERENCES cars (id)');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C1CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C18702F506 FOREIGN KEY (cars_id) REFERENCES cars (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A8702F506');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C18702F506');
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D14A21214B7');
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668727ACA70');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C1CFFE9AD6');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE67B3B43D');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE order_details');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
