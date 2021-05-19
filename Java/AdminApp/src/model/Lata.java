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
public class Lata {
    /**
     * Private atributes
     */
    private int lata_id;
    private int capacidad;
    /**
     * 
     * @param lata_id id of lata
     * @param capacidad capacidad of lata
     */
    public Lata(int lata_id, int capacidad) {
        this.lata_id = lata_id;
        this.capacidad = capacidad;
    }

    public Lata() {
    }
    
    /**
     * 
     * @return id of lata
     */
    public int getLata_id() {
        return lata_id;
    }
    /**
     * 
     * @param lata_id Sets the lata id to the given value
     */
    public void setLata_id(int lata_id) {
        this.lata_id = lata_id;
    }
    /**
     * 
     * @return capacidad of lata
     */
    public int getCapacidad() {
        return capacidad;
    }
    /**
     * 
     * @param capacidad Sets the capacidad to the given value
     */
    public void setCapacidad(int capacidad) {
        this.capacidad = capacidad;
    }

    @Override
    public String toString() {
        return String.valueOf(lata_id);
    }
}
