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
public class ReserveTable extends AbstractTableModel {
    /**
     * Private atributes
     */
    private ArrayList<Reserve> reserves = new ArrayList<>();
    private String[] columns = {"Dni","id_lata","Dia reservado","Dia dereserva"};
    /**
     * Constructor
     */
    public ReserveTable(){
        reserves=Model.readReserve();
      
    }
    @Override
    /**
     * Returns the number of rows in the model.
     */
    public int getRowCount() {
        return reserves.size();
    }
    
    @Override
    /**
     * Returns the number of columns in the model.
     */
    public int getColumnCount() {
        return columns.length;
    }
   
    @Override
    /**
     * Returns the name of the column at columnIndex.
     */   
    public String getColumnName(int column){
        return columns[column];
    }
    
    @Override
    /**
     * Returns the value for the cell at columnIndex and rowIndex.
     */
    public Object getValueAt(int rowIndex, int columnIndex){
        switch(columnIndex){
            case 0: return reserves.get(rowIndex).getDni();
            case 1: return reserves.get(rowIndex).getIdLata();
            case 2: return reserves.get(rowIndex).getDia_reservado();
            case 3: return reserves.get(rowIndex).getDia_dereserva();
            default: return null;
        }
    }
}
