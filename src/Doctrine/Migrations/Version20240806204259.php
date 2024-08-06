<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240806204259 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cart (id VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cart_line (id VARCHAR(255) NOT NULL, product_id VARCHAR(255) DEFAULT NULL, quantity INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3EF1B4CF4584665A ON cart_line (product_id)');
        $this->addSql('CREATE TABLE order_table (id VARCHAR(255) NOT NULL, payment_id VARCHAR(255) DEFAULT NULL, cart_id VARCHAR(255) DEFAULT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_75B7FBBB4C3A3BB ON order_table (payment_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_75B7FBBB1AD5CDBF ON order_table (cart_id)');
        $this->addSql('CREATE TABLE payment (id VARCHAR(255) NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product (id VARCHAR(255) NOT NULL, reference VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, price NUMERIC(10, 2) NOT NULL, vat NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN product.price IS \'(DC2Type:amount)\'');
        $this->addSql('COMMENT ON COLUMN product.vat IS \'(DC2Type:amount)\'');
        $this->addSql('CREATE TABLE product_category (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE cart_line ADD CONSTRAINT FK_3EF1B4CF4584665A FOREIGN KEY (product_id) REFERENCES product (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_table ADD CONSTRAINT FK_75B7FBBB4C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_table ADD CONSTRAINT FK_75B7FBBB1AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_line DROP CONSTRAINT FK_3EF1B4CF4584665A');
        $this->addSql('ALTER TABLE order_table DROP CONSTRAINT FK_75B7FBBB4C3A3BB');
        $this->addSql('ALTER TABLE order_table DROP CONSTRAINT FK_75B7FBBB1AD5CDBF');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE cart_line');
        $this->addSql('DROP TABLE order_table');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_category');
    }
}
