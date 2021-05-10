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
public class BuysTable extends AbstractTableModel {
    private ArrayList<Buys> buys = new ArrayList<>();
    private String[] columns = {"NumberBuys","id_product","Price","amount"};
    
    public BuysTable(){
        buys=Model.readBuys();
      
    }
    @Override
    public int getRowCount() {
        return buys.size();
    }
    
    @Override
    public int getColumnCount() {
        return columns.length;
    }
   
    @Override
    public String getColumnName(int column){
        return columns[column];
    }
    
    @Override
    public Object getValueAt(int rowIndex, int columnIndex){
        switch(columnIndex){
            case 0: return buys.get(rowIndex).getNumberBuy();
            case 1: return buys.get(rowIndex).getId_product();
            case 2: return buys.get(rowIndex).getPrice();
            case 3: return buys.get(rowIndex).getAmount();
            default: return null;
        }
    }
} 
    

