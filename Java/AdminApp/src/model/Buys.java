/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author arambarri.oihana
 */
public class Buys {
    private int numberBuy;
    private int id_product;
    private int price;
    private int amount;

    public Buys(int numberBuy, int id_product, int price, int amount) {
        this.numberBuy = numberBuy;
        this.id_product = id_product;
        this.price = price;
        this.amount = amount;
    }

    public int getNumberBuy() {
        return numberBuy;
    }

    public void setNumberBuy(int numberBuy) {
        this.numberBuy = numberBuy;
    }

    public int getId_product() {
        return id_product;
    }

    public void setId_product(int id_product) {
        this.id_product = id_product;
    }

    public int getPrice() {
        return price;
    }

    public void setPrice(int price) {
        this.price = price;
    }

    public int getAmount() {
        return amount;
    }

    public void setAmount(int amount) {
        this.amount = amount;
    }

    @Override
    public String toString() {
        return "Buys{" + "numberBuy=" + numberBuy + ", id_product=" + id_product + ", price=" + price + ", amount=" + amount + '}';
    }
    
    
    
    
    
}
