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
public class InventaryTable extends AbstractTableModel {
    /**
     * Private atributes
     */
    private ArrayList<Inventary> buys = new ArrayList<>();
    private String[] columns = {"Id_product","name","amount"};
    /**
     * Constructor
     */
    public InventaryTable(){
        buys=Model.readInventary();
      
    }
     /**
     * Returns the number of rows in the model.

     */
    @Override
    public int getRowCount() {
        return buys.size();
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
            case 0: return buys.get(rowIndex).getId_product();
            case 1: return buys.get(rowIndex).getName();
            case 2: return buys.get(rowIndex).getAmount();
            default: return null;
        }
    }
} 
    

