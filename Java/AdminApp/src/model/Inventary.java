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
public class Inventary {
    /**
     * Private atributes
     */
    private int id_product;
    private String name;
    private int amount;
    /**
     * Constructor
     * @param id_product id of product
     * @param name name of product
     * @param amount amount of product
     */
    public Inventary(int id_product, String name, int amount) {
        this.id_product = id_product;
        this.name = name;
        this.amount = amount;
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
     * @param id_product Sets the id of product to the given value
     */
    public void setId_product(int id_product) {
        this.id_product = id_product;
    }
    /**
     * 
     * @return name of product
     */
    public String getName() {
        return name;
    }
    /**
     * 
     * @param name Sets the name to the given value
     */
    public void setName(String name) {
        this.name = name;
    }
    /**
     * 
     * @return amount of product
     */
    public int getAmount() {
        return amount;
    }
    /**
     * 
     * @param amount Sets the amount to the given value
     */
    public void setAmount(int amount) {
        this.amount = amount;
    }

    @Override
    public String toString() {
        return "Inventary{" + "id_product=" + id_product + ", name=" + name + ", amount=" + amount + '}';
    }

}
