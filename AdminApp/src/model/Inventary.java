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
    private int id_product;
    private String name;
    private int amount;

    public Inventary(int id_product, String name, int amount) {
        this.id_product = id_product;
        this.name = name;
        this.amount = amount;
    }

    public int getId_product() {
        return id_product;
    }

    public void setId_product(int id_product) {
        this.id_product = id_product;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getAmount() {
        return amount;
    }

    public void setAmount(int amount) {
        this.amount = amount;
    }

    @Override
    public String toString() {
        return "Inventary{" + "id_product=" + id_product + ", name=" + name + ", amount=" + amount + '}';
    }
    
    
}
