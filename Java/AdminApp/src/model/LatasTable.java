/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;

/**
 *
 * @author arambarri.oihana
 */
public class LatasTable extends AbstractTableModel {
    /**
     * Private atributes
     */
    private ArrayList<Lata> latas = new ArrayList<>();
    private String[] columns = {"lata_id","capacidad"};
    /**
     * Constructor
     */
    public LatasTable(){
        latas=Model.readLatas();
      
    }
     /**
     * Returns the number of rows in the model.

     */
    @Override
    public int getRowCount() {
        return latas.size();
    }
     /**
     * Returns the number of columns in the model.
     */
    @Override
    public int getColumnCount() {
        return columns.length;
    }
   /**
     * Returns the name of the column at columnIndex.
     */  
    @Override
    public String getColumnName(int column){
        return columns[column];
    }
    /**
     * Returns the value for the cell at columnIndex and rowIndex.
     */
    @Override
    public Object getValueAt(int rowIndex, int columnIndex){
        switch(columnIndex){
            case 0: return latas.get(rowIndex).getLata_id();
            case 1: return latas.get(rowIndex).getCapacidad();
            default: return null;
        }
    }
} 
    

