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
public class Purchase {
    /**
    * Private atributes
    */
    private int numberBuy;
    private int id_product;
    private String price;
    private int account;
    /**
     * Constructor
     * @param numberBuy number of buy
     * @param id_product id of product
     * @param price price of buy
     * @param account  how many buy
     */
    public Purchase(int numberBuy, int id_product, String price, int account) {
        this.numberBuy = numberBuy;
        this.id_product = id_product;
        this.price = price;
        this.account = account;
    }
    /**
     * 
     * @return number of this buy
     */
    public int getNumberBuy() {
        return numberBuy;
    }
    /**
     * 
     * @param numberBuy Sets the number of buy  to the given value
     */
    public void setNumberBuy(int numberBuy) {
        this.numberBuy = numberBuy;
    }
    /**
     * 
     * @return id of product
     */
    public int getId_product() {
        return id_product;
    }
    /**
     * 
     * @param id_product Sets the id_product to the given value
     */
    public void setId_product(int id_product) {
        this.id_product = id_product;
    }
    /**
     * 
     * @return price of this buy
     */
    public String getPrice() {
        return price;
    }
    /**
     * 
     * @param price Sets the price to the given value
     */
    public void setPrice(String price) {
        this.price = price;
    }
    /**
     * 
     * @return account of this buy
     */
    public int getAccount() {
        return account;
    }
    /**
     * 
     * @param account Sets the account to the given value 
     */
    public void setAccount(int account) {
        this.account = account;
    }

    @Override
    public String toString() {
        return "Buys{" + "numberBuy=" + numberBuy + ", id_product=" + id_product + ", price=" + price + ", account=" + account + '}';
    }
    
    
    
    
    
}
