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
public class Latas {
    private int lata_id;
    private String capacidad;

    public Latas(int lata_id, String capacidad) {
        this.lata_id = lata_id;
        this.capacidad = capacidad;
    }

    public int getLata_id() {
        return lata_id;
    }

    public void setLata_id(int lata_id) {
        this.lata_id = lata_id;
    }

    public String getCapacidad() {
        return capacidad;
    }

    public void setCapacidad(String capacidad) {
        this.capacidad = capacidad;
    }

    @Override
    public String toString() {
        return "Latas{" + "lata_id=" + lata_id + ", capacidad=" + capacidad + '}';
    }

    
    
    
}
